"use strict";

var _interopRequireDefault = require("@babel/runtime/helpers/interopRequireDefault");

exports.__esModule = true;
exports.default = void 0;

var _creator = _interopRequireDefault(require("./creator"));

if (!window.katex) {
  console.error('Please import resources katex from cdn');
}

var _default = (0, _creator.default)(window.katex);

exports.default = _default;