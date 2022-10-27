@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../sphpdox/sphpdox/composer/bin/sphpdox
php "%BIN_TARGET%" %*
