/**
 * 
 * WPGulp Configuration File
 * 
 * @package https://github.com/ahmadawais/WPGulp
 * 
 */

// Project options.

// Local project URL of your already running WordPress site.
// > Could be something like "wpgulp.local" or "localhost"
// > depending upon your local WordPress setup.
const projectURL = 'http://localhost/atss-development';

// Theme/Plugin URL. Leave it like it is; since our gulpfile.js lives in the root folder.
const productURL = './';
const browserAutoOpen = false;
const injectChanges = true;

// >>>>> Style options.
// Path to main .scss file.
const styleSRC = './v2/assets/scss/style.scss';

// Path to place the compiled CSS file. Default set to root folder.
const styleDestination = './v2/assets/css';

// Available options → 'compact' or 'compressed' or 'nested' or 'expanded'
const outputStyle = 'compressed';
const errLogToConsole = true;
const precision = 10;

// JS options.

// Path to scripts folder.
const jsSRC = './v2/assets/js/src/script.js';

// Path to place the compiled scripts file.
const jsDestination = './v2/assets/js/';

// Compiled JS file name. Default set to script i.e. script.js.
const jsFile = 'script';

// >>>>> Watch files paths.
// Path to all *.scss files inside css folder and inside them.
const watchStyles = './v2/assets/scss/*.scss';

// Path to all JS files.
const watchJs = './v2/assets/js/src/*.js';

// Path to all PHP files.
const watchPhp = './**/*.php';

// >>>>> Zip file config.
// Must have.zip at the end.
const zipName = 'athemes-starter-sites.zip';

// Must be a folder outside of the zip folder.
const zipDestination = './../'; // Default: Parent folder.
const zipIncludeGlob = ['./**/*']; // Default: Include all files/folders in current directory.

// Default ignored files and folders for the zip file.
const zipIgnoreGlob = [
	'!./{node_modules,node_modules/**/*}',
	'!./.git',
	'!./.svn',
	'!./gulpfile.babel.js',
	'!./wpgulp.config.js',
	'!./.eslintrc.js',
	'!./.eslintignore',
	'!./.editorconfig',
	'!./phpcs.xml.dist',
	'!./vscode',
	'!./package.json',
	'!./package-lock.json',
	'!./v2/assets/js/scss/**/*',
	'!./v2/assets/js/scss',
	'!./v2/assets/js/src/**/*',
	'!./v2/assets/js/src'
];

// >>>>> Translation options.
// Your text domain here.
const textDomain = 'athemes-starter-sites';

// Name of the translation file.
const translationFile = 'athemes-starter-sites.pot';

// Where to save the translation files.
const translationDestination = './languages';

// Package name.
const packageName = 'athemes-starter-sites';

// Where can users report bugs.
const bugReport = 'https://athemes.com/contact/';

// Last translator Email ID.
const lastTranslator = 'aThemes <team@athemes.com>';

// Team's Email ID.
const team = 'aThemes <team@athemes.com>';

// Browsers you care about for auto-prefixing. Browserlist https://github.com/ai/browserslist
// The following list is set as per WordPress requirements. Though; Feel free to change.
const BROWSERS_LIST = ['last 2 version', '> 1%'];

// Export.
module.exports = {
	projectURL,
	productURL,
	browserAutoOpen,
	injectChanges,
	styleSRC,
	styleDestination,
	outputStyle,
	errLogToConsole,
	precision,
	jsSRC,
	jsDestination,
	jsFile,
	watchStyles,
	watchJs,
	watchPhp,
	zipName,
	zipDestination,
	zipIncludeGlob,
	zipIgnoreGlob,
	textDomain,
	translationFile,
	translationDestination,
	packageName,
	bugReport,
	lastTranslator,
	team,
	BROWSERS_LIST
};
