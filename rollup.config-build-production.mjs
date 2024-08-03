import { babel } from "@rollup/plugin-babel";
import commonjs from "@rollup/plugin-commonjs";
import terser from "@rollup/plugin-terser";
import dotenv from "dotenv";

export default {
  input: "./js/index.js",
  output: [
    {
      file: `./site/wp-content/themes/${dotenv.config().parsed.THEMEDIRJS}/app.min.js`,
      format:  "iife",
      plugins: [terser()]
    }
  ],
  plugins: [
    commonjs(),
    babel({ babelHelpers: "bundled" })
  ]
};