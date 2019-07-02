const gulp = require('gulp'); // gulpプラグインの読み込み
const sass = require('gulp-sass'); // Sassをコンパイルするプラグインの読み込み
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');

// style.scssの監視タスクを作成する
gulp.task('default', function () {
  // ★ style.scssファイルを監視
  gulp.watch(['sass/style.scss','sass/*/*','sass/*/*/*'], function () {
    // style.scssの更新があった場合の処理

    // style.scssファイルを取得
    gulp.src('sass/style.scss')
      // Sassのコンパイルを実行
      .pipe(sourcemaps.init())
      .pipe(sass({
        outputStyle: 'compressed', //(nested | expanded | compact | compressed)
        })
      // Sassのコンパイルエラーを表示(これがないと自動的に止まってしまう)
        .on('error', sass.logError)
      )
      .pipe(autoprefixer({  //autoprefixerの実行
        browsers: ["last 2 versions"],
        cascade: false
      }))
      .pipe(sourcemaps.write("./")) //ソースマップを書き出します
      // cssフォルダー以下に保存
      .pipe(gulp.dest('./'));
  });
});