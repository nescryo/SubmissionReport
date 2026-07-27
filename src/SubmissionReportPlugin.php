<?php

namespace SubmissionReport;

use App\Classes\Plugin;
use App\Facades\Hook;
use Filament\Panel;
use SubmissionReport\Pages\SubmissionReportPage;

class SubmissionReportPlugin extends Plugin
{
	public function boot() {}


	public function onPanel(mixed $panel): void
	{
		if (is_object($panel) && method_exists($panel, 'pages')) {
			$panel->pages([
				SubmissionReportPage::class,
			]);
		}
	}

	public function getPluginPage(): ?string
	{
		if (! app()->getCurrentScheduledConferenceId()) {
			return null;
		}

		try {
			return SubmissionReportPage::getUrl();
		} catch (\Throwable $th) {
			return null;
		}
	}
}
