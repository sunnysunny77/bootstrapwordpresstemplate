import { babel } from "@rollup/plugin-babel";
import { nodeResolve } from "@rollup/plugin-node-resolve";
import commonjs from "@rollup/plugin-commonjs";
import dotenv from "dotenv";
import fs from "fs";
import livereload from "rollup-plugin-livereload";
import terser from "@rollup/plugin-terser";

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
    babel({ babelHelpers: "bundled" }),
    commonjs({
      include: /node_modules/,
    }),
    nodeResolve(),
    livereload({
      watch: "./site/wp-content/themes/",
      port: 2999,
      https: {
        key: fs.readFileSync("./certs/server.key"),
        cert: fs.readFileSync("./certs/server.crt"),
      },
    }),
  ],
};