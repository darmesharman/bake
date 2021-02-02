"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _axios = _interopRequireDefault(require("axios"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var instance = _axios["default"].create({
  withCredentials: true
});

instance.interceptors.request.use(function (request) {
  request.headers.common['Accept'] = 'application/json'; // request.headers.common['Content-Type'] = 'application/json';

  return request;
});
instance.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  if (error.response.status === 401) {
    sessionStorage.removeItem('user');
    window.location.reload();
  }

  return Promise.reject(error);
});
var _default = instance;
exports["default"] = _default;