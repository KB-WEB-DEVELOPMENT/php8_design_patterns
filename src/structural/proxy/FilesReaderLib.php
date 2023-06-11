<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Proxy;

interface  FilesReaderLib
{
	public function isLocalFile():  bool;
	public function isReadableFile(): bool;
	public function getFileInfos(): array;
	public function copyRemoteFile(): bool;
}