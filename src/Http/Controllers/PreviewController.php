<?php

namespace LaravelEnso\Mails\Http\Controllers;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Http\Response;
use Illuminate\Mail\Markdown;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response as ResponseFactory;
use Illuminate\Support\Facades\View;
use LaravelEnso\Mails\Preview\PreviewDefinition;
use LaravelEnso\Mails\Preview\PreviewRegistry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PreviewController extends Controller
{
    public function index(PreviewRegistry $registry): ViewContract
    {
        $this->authorizePreview();

        return View::make('laravel-enso/mails::previews.index', [
            'previews' => $registry->all(),
        ]);
    }

    public function show(string $preview, PreviewRegistry $registry, Markdown $markdown): Response
    {
        $this->authorizePreview();

        $definition = $registry->get($preview);

        if ($definition === null) {
            throw new NotFoundHttpException();
        }

        return ResponseFactory::make($this->render($definition, $markdown));
    }

    private function authorizePreview(): void
    {
        if (! Config::get('enso.mails.preview.enabled')) {
            throw new NotFoundHttpException();
        }
    }

    private function render(PreviewDefinition $preview, Markdown $markdown): string
    {
        return $markdown->render($preview->view(), $preview->data())->toHtml();
    }
}
