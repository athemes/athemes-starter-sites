/**
 *
 * Gulpfile.
 * Gulp with WordPress.
 *
 * @package https://github.com/ahmadawais/WPGulp
 *
 */

/**
 * Load WPGulp Configuration.
 */
const config = require('./wpgulp.config.js');

/**
 * Load Plugins.
 */
const gulp = require('gulp'); // Gulp of-course.

// CSS related plugins.
const nodesass = require('node-sass')
const sass = require('gulp-sass')(nodesass);
const minifycss = require('gulp-uglifycss');
const autoprefixer = require('gulp-autoprefixer');
const mmq = require('gulp-merge-media-queries');
const rtlcss = require('gulp-rtlcss');

// JS related plugins.
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');

// Image related plugins.
const imagemin = require('gulp-imagemin');

// Utility related plugins.
const rename = require('gulp-rename');
const lineec = require('gulp-line-ending-corrector');
const filter = require('gulp-filter');
const notify = require('gulp-notify');
const browserSync = require('browser-sync').create();
const wpPot = require('gulp-wp-pot'); 
const sort = require('gulp-sort');
const cache = require('gulp-cache');
const remember = require('gulp-remember');
const plumber = require('gulp-plumber');
const beep = require('beepbeep');
const zip = require('gulp-zip');

/**
 * Custom Error Handler.
 *
 * @param Mixed err
 */
const errorHandler = r => {
	notify.onError('\n\n❌  ===> ERROR: <%= error.message %>\n')(r);
	beep();
};

/**
 * Task: `browser-sync`.
 */
const browsersync = done => {
	browserSync.init({
		proxy: config.projectURL,
		open: config.browserAutoOpen,
		injectChanges: config.injectChanges,
		watchEvents: ['change', 'add', 'unlink', 'addDir', 'unlinkDir']
	});
	done();
};

// Helper function to allow browser reload with Gulp 4.
const reload = done => {
	browserSync.reload();
	done();
};

/**
 * Task: `styles`.
 */
gulp.task('styles', () => {
	return gulp
		.src(config.styleSRC, {allowEmpty: true})
		.pipe(plumber(errorHandler))
		.pipe(
			sass({
				errLogToConsole: config.errLogToConsole,
				outputStyle: config.outputStyle,
				precision: config.precision
			})
		)
		.on('error', sass.logError)
		.pipe(autoprefixer(config.BROWSERS_LIST))
		.pipe(lineec())
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter('**/*.css'))
		.pipe(mmq({log: true}))
		.pipe(browserSync.stream()) 
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss({maxLineLen: 10}))
		.pipe(lineec())
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter('**/*.css'))
		.pipe(browserSync.stream())
		.pipe(
			notify({
				message: '\n\n✅  ===> STYLES — completed!\n',
				onLast: true
			})
		);
});

/**
 * Task: `stylesRTL`.
 */
gulp.task('stylesRTL', () => {
	return gulp
		.src(config.styleSRC, {allowEmpty: true})
		.pipe(plumber(errorHandler))
		.pipe(
			sass({
				errLogToConsole: config.errLogToConsole,
				outputStyle: config.outputStyle,
				precision: config.precision
			})
		)
		.on('error', sass.logError)
		.pipe(autoprefixer(config.BROWSERS_LIST))
		.pipe(lineec())
		.pipe(rename({suffix: '-rtl'}))
		.pipe(rtlcss())
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter('**/*.css'))
		.pipe(browserSync.stream())
		.pipe(mmq({log: true}))
		.pipe(rename({suffix: '.min'}))
		.pipe(minifycss({maxLineLen: 10}))
		.pipe(lineec())
		.pipe(gulp.dest(config.styleDestination))
		.pipe(filter('**/*.css'))
		.pipe(browserSync.stream())
		.pipe(
			notify({
				message: '\n\n✅  ===> STYLES RTL — completed!\n',
				onLast: true
			})
		);
});

/**
 * Task: `scripts`.
 */
gulp.task('scripts', () => {
	return gulp
		.src(config.jsSRC, {since: gulp.lastRun('scripts')})
		.pipe(plumber(errorHandler))
		.pipe(
			babel({
				presets: [
					[
						'@babel/preset-env',
						{
							targets: {browsers: config.BROWSERS_LIST}
						}
					]
				]
			})
		)
		.pipe(remember(config.jsSRC))
		.pipe(concat(config.jsFile + '.js'))
		.pipe(lineec())
		.pipe(gulp.dest(config.jsDestination))
		.pipe(
			rename({
				basename: config.jsFile,
				suffix: '.min'
			})
		)
		.pipe(uglify())
		.pipe(lineec())
		.pipe(gulp.dest(config.jsDestination))
		.pipe(
			notify({
				message: '\n\n✅  ===> JS — completed!\n',
				onLast: true
			})
		);
});

/**
 * Task: `clear-images-cache`.
 */
gulp.task('clearCache', function (done) {
	return cache.clearAll(done);
});

/**
 * WP POT Translation File Generator.
 */
gulp.task('translate', () => {
	return gulp
		.src(config.watchPhp)
		.pipe(sort())
		.pipe(
			wpPot({
				domain: config.textDomain,
				package: config.packageName,
				bugReport: config.bugReport,
				lastTranslator: config.lastTranslator,
				team: config.team
			})
		)
		.pipe(gulp.dest(config.translationDestination + '/' + config.translationFile))
		.pipe(
			notify({
				message: '\n\n✅  ===> TRANSLATE — completed!\n',
				onLast: true
			})
		);
});

/**
 * Zips theme or plugin and places in the parent directory
 */
gulp.task('zip', () => {
	const src = [...config.zipIncludeGlob, ...config.zipIgnoreGlob];
	return gulp.src(src).pipe(zip(config.zipName)).pipe(gulp.dest(config.zipDestination));
});

/**
 * Watch Tasks.
 */
gulp.task(
	'default',
	gulp.parallel('styles', 'scripts', browsersync, () => {
		gulp.watch(config.watchPhp, reload);
		gulp.watch(config.watchStyles, gulp.parallel('styles'));
		gulp.watch(config.watchJs, gulp.series('scripts', reload));
	})
);
