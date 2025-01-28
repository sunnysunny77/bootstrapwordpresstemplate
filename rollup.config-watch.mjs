import { babel } from "@rollup/plugin-babel";
import commonjs from "@rollup/plugin-commonjs";
import terser from "@rollup/plugin-terser";
import livereload from "rollup-plugin-livereload";
import fs from "fs";
import dotenv from "dotenv";
import { nodeResolve } from "@rollup/plugin-node-resolve";

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
    commonjs({
      include: /node_modules/,
    }),
    nodeResolve(),
    babel({ babelHelpers: "bundled" }),
    livereload({
      watch: "./site/wp-content/themes/",
      port: 2999,
      https: {
        key: fs.readFileSync("./certs/server.key"),
        cert: fs.readFileSync("./certs/server.crt")
      }
    })
  ]
};