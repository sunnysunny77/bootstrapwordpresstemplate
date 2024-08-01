import { babel } from "@rollup/plugin-babel";
import commonjs from "@rollup/plugin-commonjs";
import terser from "@rollup/plugin-terser";
import livereload from "rollup-plugin-livereload";
import fs from "fs";

export default {
  input: "./js/index.js",
  output: [
    {
      file: "./site/wp-content/themes/bsv3/assets/js/app.min.js",
      format:  "iife",
      plugins: [terser()]
    }
  ],
  plugins: [
    commonjs(),
    babel({ babelHelpers: "bundled" }),
    livereload({
      watch: "./site/wp-content/themes/bsv3",
      port: 2999,
      https: {
        key: fs.readFileSync("./certs/server.key"),
        cert: fs.readFileSync("./certs/server.crt")
      }
    })
  ]
};