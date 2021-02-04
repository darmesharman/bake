"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _axios = _interopRequireDefault(require("axios"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

var _default = {
  data: function data() {
    return {
      session: null,
      login: null
    };
  },
  createSession: function createSession() {},
  login: function login(params) {
    var _this = this;

    var url = 'http://localhost:8000/api/auth';
    var config = {
      'headers': {
        'Accept': 'application/json',
        'x-csrf-token': params.token
      }
    };
    var data = params.data;

    _axios["default"].post(url, data, config).then(function (response) {
      _this.login = response;
    }); // return api.post('http://localhost:8000/api/auth', params);

  },
  logout: function logout() {
    return api["delete"]('http://localhost:8000/logout');
  },
  getPosts: function getPosts() {
    return api.get("http://localhost:8000/api/posts");
  }
};
exports["default"] = _default;