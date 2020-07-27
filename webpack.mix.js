let mix = require("laravel-mix")

mix
  .webpackConfig({
    devtool: "source-map"
  })
  .options({
    processCssUrls: false
  })

mix.js("resources/assets/js/app.js", "public/js").sourceMaps()
mix.sass("resources/assets/scss/app.scss", "public/css/").sourceMaps()

mix.disableNotifications()

if (!mix.inProduction()) {
  mix.browserSync("maestra.staging.com")
}
