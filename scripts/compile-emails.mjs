import mjml2html from 'mjml';
import { existsSync, mkdirSync, readFileSync, writeFileSync } from 'node:fs';
import { dirname, join, relative } from 'node:path';
import { fileURLToPath } from 'node:url';

const root = dirname(dirname(fileURLToPath(import.meta.url)));
const targetRoot = join(root, 'resources/views/vendor/mail/html');
const source = join(root, 'resources/mjml/html/message.mjml.blade.php');
const check = process.argv.includes('--check');
const documents = [
  { target: 'message.blade.php', width: '600px' },
  { target: 'message-wide.blade.php', width: '760px' },
];
const aliases = new Map([
  ['message.blade.php', ['transactional.blade.php', 'action-required.blade.php']],
  ['message-wide.blade.php', ['report.blade.php']],
]);
const replacements = new Map([
  ['ENSO_BRAND_NAME', "{{ config('enso.mails.brand.name') }}"],
  ['Inter, Arial, sans-serif', "{!! config('enso.mails.text.font_family') !!}"],
  ['border-radius:18px', "border-radius:{{ config('enso.mails.layout.card_radius') }}px"],
  ['border-radius: 18px', "border-radius: {{ config('enso.mails.layout.card_radius') }}px"],
  ['#F4F7FB', "{{ config('enso.mails.layout.background') }}"],
  ['#F5F7FA', "{{ config('enso.mails.layout.background') }}"],
  ['#EEF3F8', "{{ config('enso.mails.layout.background') }}"],
  ['#F7FAFC', "{{ config('enso.mails.components.box.background') }}"],
  ['#FFFFFE', "{{ config('enso.mails.colors.white') }}"],
  ['#FFFFFF', "{{ config('enso.mails.layout.surface') }}"],
  ['#DBDBDB', "{{ config('enso.mails.layout.border') }}"],
  ['#00D1B2', "{{ config('enso.mails.colors.primary') }}"],
  ['#485FC7', "{{ config('enso.mails.colors.link') }}"],
  ['#14161A', "{{ config('enso.mails.colors.dark') }}"],
  ['#363636', "{{ config('enso.mails.text.heading') }}"],
  ['#4A4A4A', "{{ config('enso.mails.text.body') }}"],
  ['#7A7A7A', "{{ config('enso.mails.text.muted') }}"],
  ['ENSO_HEADER', "@include('mail::header')"],
  ['ENSO_SLOT', "{{ Illuminate\\Mail\\Markdown::parse($slot) }}"],
  ['ENSO_SUBCOPY', "{{ $subcopy ?? '' }}"],
  ['ENSO_FOOTER', "@include('mail::footer')"],
]);

const withCardWidth = (html) => html.replaceAll(
  '<div class="enso-mail-card" style="',
  '<div class="enso-mail-card" style="width: calc(100% - 32px); ',
);

const withFrameSpacing = (html) => html.replace(
  /<div aria-label="([^"]+)" aria-roledescription="email" style="background-color:([^;]+);" role="article"/,
  '<div class="enso-mail-frame" aria-label="$1" aria-roledescription="email" style="background-color:$2; padding: 56px 0 80px;" role="article"',
);

const compiledOutput = (html) => {
  let output = withFrameSpacing(withCardWidth(html.trim()));

  for (const [search, replacement] of replacements.entries()) {
    output = output.replaceAll(search, replacement);
  }

  return output;
};

let hasDiff = false;

for (const document of documents) {
  const target = join(targetRoot, document.target);
  const mjml = readFileSync(source, 'utf8').replaceAll('ENSO_WIDTH', document.width);
  const { html, errors } = mjml2html(mjml, {
    keepComments: false,
    minify: false,
    validationLevel: 'soft',
  });

  if (errors.length > 0) {
    errors.forEach((error) => {
      console.warn(`${relative(root, source)}:${error.line} ${error.message}`);
    });
  }

  const output = `${compiledOutput(html)}\n`;

  if (check) {
    const current = existsSync(target) ? readFileSync(target, 'utf8') : null;

    if (current !== output) {
      hasDiff = true;
      console.error(`${relative(root, target)} is not up to date`);
    }
  } else {
    mkdirSync(dirname(target), { recursive: true });
    writeFileSync(target, output);
    console.log(`Compiled ${relative(root, source)} -> ${relative(root, target)}`);
  }
}

for (const [source, targets] of aliases.entries()) {
  const sourcePath = join(targetRoot, source);
  const output = readFileSync(sourcePath, 'utf8');

  for (const target of targets) {
    const targetPath = join(targetRoot, target);

    if (check) {
      const current = existsSync(targetPath) ? readFileSync(targetPath, 'utf8') : null;

      if (current !== output) {
        hasDiff = true;
        console.error(`${relative(root, targetPath)} is not up to date`);
      }
    } else {
      writeFileSync(targetPath, output);
      console.log(`Compiled ${relative(root, sourcePath)} -> ${relative(root, targetPath)}`);
    }
  }
}

if (hasDiff) {
  process.exitCode = 1;
}
