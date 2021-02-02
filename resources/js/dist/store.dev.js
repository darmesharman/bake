"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vue = _interopRequireDefault(require("vue"));

var _vuex = _interopRequireDefault(require("vuex"));

var _axios = _interopRequireDefault(require("axios"));

var _formData = _interopRequireDefault(require("form-data"));

var _axiosCookiejarSupport = _interopRequireDefault(require("axios-cookiejar-support"));

var _toughCookie = _interopRequireDefault(require("tough-cookie"));

var _repository = _interopRequireDefault(require("./repository"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

(0, _axiosCookiejarSupport["default"])(_axios["default"]);

_vue["default"].use(_vuex["default"]);

var _default = new _vuex["default"].Store({
  state: {
    connect: false,
    message: null,
    socketid: null,
    lastupdate: null,
    items: null,
    addingboard: false,
    newleaddescription: 'none',
    medifylead: [],
    newcoltitle: 'n',
    modifyingleadID: -1,
    modifyinleadcolID: -1,
    loaded: false,
    clicks: 0,
    cold: false,
    isediting: true,
    timer: null,
    isdraggable: false,
    leadadding: false,
    newleadcontent: '',
    hascompanies_data: false,
    hashome_data: false,
    hasdashboard_data: false,
    companies: [],
    home: {
      searchForm: {
        cityID: -1,
        destrictID: -1,
        categoryID: -1
      },
      companies: [],
      categories: [],
      cities: [],
      districts: [],
      blogs: []
    },
    dashboard: {
      items: [],
      token: null,
      updates: null
    },
    user: sessionStorage.user ? JSON.parse(sessionStorage.getItem('user')) : null
  },
  mutations: {
    SOCKET_CONNECT: function SOCKET_CONNECT(state, status) {
      console.log(55);
      state;
      status;
      state.connect = true;
    },
    SOCKET_USER_MESSAGE: function SOCKET_USER_MESSAGE(state, message) {
      state.message = message;
      state;
      status;
    },
    CREATE_LEAD: function CREATE_LEAD(state, data) {
      state.dashboard.items[data.colidx].leads.push({
        id: data.id,
        board_id: data.item.id,
        description: data.value,
        created_at: data.created_at,
        updated_at: data.updated_at
      });
    },
    REMOVE_LEAD: function REMOVE_LEAD(state, data) {
      // state.dashboard.items
      // let index = state.dashboard.items[data.colidx].leads[data.leadidx]
      state.dashboard.items[data.colidx].leads.splice(data.leadidx, 1);
    },
    UPDATE_LEAD: function UPDATE_LEAD(state, data) {
      var index = state.dashboard.items[data.colidx].leads.findIndex(function (y) {
        return y.id == data.lead.id;
      });
      state.dashboard.items[data.colidx].leads[index].description = data.value;
    },
    CREATE_BOARD: function CREATE_BOARD(state, data) {
      console.log(data);
      state.dashboard.items.push({
        id: data.id,
        title: data.title,
        order: data.order,
        leads: [],
        created_at: data.created_at,
        updated_at: data.updated_at
      });
    },
    REMOVE_BOARD: function REMOVE_BOARD(state, item) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == item.id;
      });
      state.dashboard.items.splice(index, 1);
    },
    UPDATE_BOARD: function UPDATE_BOARD(state, data) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == data.item.id;
      });
      state.dashboard.items[index].title = data.value;
    },
    SWAP_BOARDS: function SWAP_BOARDS(state, data) {
      var index = state.dashboard.items.findIndex(function (item) {
        return item.id == data.itemid;
      });
      var index2 = state.dashboard.items.findIndex(function (item) {
        return item.id == data.itemid2;
      });
      var rows = [state.dashboard.items[index], state.dashboard.items[index2]];
      state.dashboard.items.splice(index2, 1, rows[0]);
      state.dashboard.items.splice(index, 1, rows[1]);
    },
    CREATE_BOARD_UPDATE: function CREATE_BOARD_UPDATE(state, details) {
      // let index = state.dashboard.items.findIndex(y => y.id == data.item.id)
      if (!state.dashboard.items.some(function (e) {
        return e.id == details.id;
      })) state.dashboard.items.push({
        id: details.id,
        order: details.order,
        title: details.title,
        created_at: details.created_at,
        updated_at: details.updated_at,
        leads: []
      });
    },
    UPDATE_BOARD_UPDATE: function UPDATE_BOARD_UPDATE(state, details) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == details.id;
      });
      state.dashboard.items[index].order = details.order;
      state.dashboard.items[index].title = details.title;
      state.dashboard.items[index].updated_at = details.updated_at;
    },
    DELETE_BOARD_UPDATE: function DELETE_BOARD_UPDATE(state, details) {
      console.log();

      if (state.dashboard.items.some(function (e) {
        return e.id == details.id;
      })) {
        var index = state.dashboard.items.findIndex(function (y) {
          return y.id == details.id;
        });
        state.dashboard.items.splice(index, 1); // state.dashboard.items.push({ id:details.id,
        // title:details.title, order:details.order, updated_at:details.updated_at})
      }
    },
    CREATE_LEAD_UPDATE: function CREATE_LEAD_UPDATE(state, details) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == details.board_id;
      });
      if (!state.dashboard.items[index].leads.some(function (e) {
        return e.id == details.id;
      })) state.dashboard.items[index].leads.push({
        id: details.id,
        board_id: details.board_id,
        description: details.description,
        created_at: details.created_at,
        updated_at: details.updated_at
      });
    },
    UPDATE_LEAD_UPDATE: function UPDATE_LEAD_UPDATE(state, details) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == details.board_id;
      });
      var idx = state.dashboard.items[index].leads.findIndex(function (y) {
        return y.id == details.id;
      });
      state.dashboard.items[index].leads[idx].description = details.description;
      updated_at = details.updated_at;
    },
    DELETE_LEAD_UPDATE: function DELETE_LEAD_UPDATE(state, details) {
      var index = state.dashboard.items.findIndex(function (y) {
        return y.id == details.board_id;
      });

      if (state.dashboard.items[index].leads.some(function (e) {
        return e.id == details.id;
      })) {
        var idx = state.dashboard.items[index].leads.findIndex(function (y) {
          return y.id == details.id;
        });
        console.log(idx);
        state.dashboard.items[index].leads.splice(idx, 1);
      }
    },
    FETCH_HOME: function FETCH_HOME(state, data) {
      state.hashome_data = true;
      state.home.companies = data.companies;
      state.home.categories = data.companies;
      state.home.cities = data.cities;
      state.home.districts = data.districts;
      state.home.blogs = data.blogs;
    },
    FETCH_SEARCH_HOME: function FETCH_SEARCH_HOME(state, data) {
      data;
    },
    FETCH_COMPANIES: function FETCH_COMPANIES(state, data) {
      state.hascompanies_data = true;
      state.companies = data.companies;
    },
    FETCH_DASHBOARD: function FETCH_DASHBOARD(state, data) {
      state.hasdashboard_data = true;
      data.boards.forEach(function (element) {
        element = element.value;
      });
      state.dashboard.items = data.boards;
      state.dashboard.token = data.token; // console.log(state.dashboard.data )
    },
    MOVE_LEAD: function MOVE_LEAD(state, data) {
      var index = state.dashboard.items.findIndex(function (item) {
        return item.id == data.r_data.board_id;
      });
      var idx;
      if (data.data.ident == 0) idx = state.dashboard.items[index].leads.findIndex(function (item) {
        return item.order > data.r_data.order;
      }) - 1;else idx = state.dashboard.items[index].leads.findIndex(function (item) {
        return item.order > data.r_data.order;
      });
      state.dashboard.items[index].leads.splice(idx, 0, data.data.item_target); // idx = state.dashboard.items[index].leads.findIndex(item => == )
      // state.dashboard.items[index].leads.splice()
    },
    SET_USER: function SET_USER(state, user) {
      state.user = user;
    }
  },
  actions: {
    fetchDashboardUpdates: function fetchDashboardUpdates(_ref, data) {
      var context = _ref.context,
          dispatch = _ref.dispatch;

      var switchOptions = function switchOptions(option, details) {
        switch (option) {
          case 0:
            dispatch('boardCreateUpdates', details);
            break;

          case 1:
            dispatch('boardUpdateUpdates', details);
            break;

          case 2:
            dispatch('boardDeleteUpdates', details);
            break;

          case 10:
            dispatch('leadCreateUpdates', details);
            break;

          case 11:
            dispatch('leadUpdateUpdates', details);
            break;

          case 12:
            dispatch('leadDeleteUpdates', details);
            break;
          // default:
          // break;
        }
      };

      data.forEach(function (element) {
        try {
          var details = JSON.parse("[" + element.data + "]");
          if (element.data != null) details.forEach(function (detail) {
            // console.log(detail)
            switchOptions(element.event, detail);
          });
        } catch (error) {}
      }); // context.commit('FETCH_DASHBOARD_UPDATES', data)
    },
    moveLead: function moveLead(context, data) {
      var url = "http://localhost:8000/api/update_boards/movelead/".concat(data.item_target.id, "/").concat(data.item.board_id, "/").concat(data.item.id, "/").concat(data.item.order, "/").concat(data.ident);
      var config = {
        'headers': {}
      };
      var data1 = {};

      _axios["default"].put(url, data1, config).then(function (response) {
        context.commit('MOVE_LEAD', {
          r_data: response.data,
          data: data
        });
      });
    },
    fetchDashboard: function fetchDashboard(context, sockets) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/dashboard";

      _axios["default"].get(url, config).then(function (response) {
        console.log(response.data.token);
        sockets.subscribe(response.data.token, function (data) {
          // console.log(data);
          context.dispatch('fetchDashboardUpdates', data.updates);
          console.log('wtfhithat');
        });
        context.commit('FETCH_DASHBOARD', response.data);
      });
    },
    login: function login(context, user) {
      var config, url, cookieJar, instance;
      return regeneratorRuntime.async(function login$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              config = {
                'headers': {
                  'Accept': 'application/json',
                  'Content-Type': 'multipart/form-data'
                }
              };
              url = 'http://localhost:8000/sanctum/csrf-cookie';
              _context.next = 4;
              return regeneratorRuntime.awrap(_axios["default"].get(url, {}).then(function (response) {
                config.headers["X-XSRF-TOKEN"] = response.config.headers['X-XSRF-TOKEN']; // config.headers["X-XSRF-TOKEN"] =
              }));

            case 4:
              // var data = new FormData();
              // data.append('phone_number', '77026651625');
              // data.append('password', 'password');
              // config = {
              //     method: 'put',
              //     url: 'http://localhost:8000/api/auth',
              //     headers: { 
              //         // 'X-Requested-With': 'XMLHttpRequest',
              //      "X-CSRF-TOKEN": config.headers["X-XSRF-TOKEN"],
              //      'Accept': 'application/json',
              //      'Content-Type': 'application/json;charset=utf-8',
              //      'Access-Control-Allow-Origin' : '*'
              //     //   'Cookie': 'laravel_session=Mb6avHg3H8jxyspOxTozypGhzy24MPUu8NatZXAh'
              //     //   ...data.getHeaders()
              //     },
              //     data : data
              //   };
              // // axios.defaults.withCredentials = true;
              // axios(config).then(response=> {
              //     console.log(response)
              // }).catch(function (error) {
              //     // handle error
              //     console.log(error);
              //   })
              cookieJar = new _toughCookie["default"].CookieJar();
              instance = _axios["default"].create({
                jar: cookieJar,
                withCredentials: true // httpsAgent: new https.Agent({ rejectUnauthorized: false, requestCert: true, keepAlive: true})

              });
              instance.defaults.headers['X-CSRF-TOKEN'] = config.headers["X-XSRF-TOKEN"];
              instance.defaults.headers['Accept'] = 'application/json';
              instance.post('http://localhost:8000/auth', user).then(function (response) {
                console.log(response);
              });
              context.commit('SET_USER', user);
              sessionStorage.user = JSON.stringify(user);

            case 11:
            case "end":
              return _context.stop();
          }
        }
      });
    },
    fetchHome: function fetchHome(context) {
      var url = "http://localhost:8000/api/home";
      var config = {
        'headers': {}
      };
      var data = {};

      _axios["default"].get(url, data, config).then(function (response) {
        context.commit('FETCH_HOME', response.data);
      });
    },
    fetchSearchHome: function fetchSearchHome(context) {
      var url = "http://localhost:8000/api/home";
      var config = {
        'headers': {}
      };
      var data = {
        cityID: home.searchForm.cityID,
        destrictID: home.searchForm.destrictID,
        categoryID: home.searchForm.categoryID
      };

      _axios["default"].get(url, data, config).then(function (response) {
        context.commit('FETCH_SEARCH_HOME', response.data);
      });
    },
    fetchCompanies: function fetchCompanies(context) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/companies";

      _axios["default"].get(url, config).then(function (response) {
        context.commit('FETCH_COMPANIES', response.data);
      });
    },
    boardCreateUpdates: function boardCreateUpdates(context, details) {
      context.commit('CREATE_BOARD_UPDATE', details);
    },
    boardUpdateUpdates: function boardUpdateUpdates(context, details) {
      context.commit('UPDATE_BOARD_UPDATE', details);
    },
    boardDeleteUpdates: function boardDeleteUpdates(context, details) {
      context.commit('DELETE_BOARD_UPDATE', details);
    },
    leadCreateUpdates: function leadCreateUpdates(context, details) {
      console.log('lead create');
      context.commit('CREATE_LEAD_UPDATE', details);
    },
    leadUpdateUpdates: function leadUpdateUpdates(context, details) {
      context.commit('UPDATE_LEAD_UPDATE', details);
    },
    leadDeleteUpdates: function leadDeleteUpdates(context, details) {
      context.commit('DELETE_LEAD_UPDATE', details);
    },
    swapBoards: function swapBoards(context, data) {
      context.commit('SWAP_BOARDS', data);
    },
    editBoard: function editBoard(context, data) {
      var config = {
        'headers': {}
      };
      var url = "http://localhost:8000/api/update_boards/updateboard/".concat(data.item.id, "/newtitle/").concat(data.value);

      _axios["default"].put(url, config).then(function (response) {
        console.log(response.data);
        context.commit('UPDATE_BOARD', data);
      });
    },
    boardCreate: function boardCreate(context, title) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      }; // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)

      var url = "http://localhost:8000/api/update_boards/newboard/".concat(title);

      _axios["default"].get(url, config).then(function (response) {
        if (response.status == 200) context.commit('CREATE_BOARD', response.data); // console.log(response.data)
      });
    },
    boardDelete: function boardDelete(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      }; // console.log(`http://localhost:8000/api/update_boards/newboard=${title}`)

      var url = "http://localhost:8000/api/update_boards/removeboard/".concat(data.item.id);

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('REMOVE_BOARD', data.item);
      });
    },
    createLead: function createLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/createlead/".concat(data.item.id, "/newleaddescription/").concat(data.value);

      _axios["default"].get(url, config).then(function (response) {
        if (response.status == 200) data.id = response.data.id;
        data.created_at = response.data.created_at;
        data.updated_at = response.data.updated_at;
        context.commit('CREATE_LEAD', data);
      });
    },
    deleteLead: function deleteLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/removelead/".concat(data.lead.id); // console.log(url)

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('REMOVE_LEAD', data);
      });
    },
    saveLead: function saveLead(context, data) {
      var config = {
        'headers': {
          'Accept': 'application/json'
        }
      };
      var url = "http://localhost:8000/api/update_boards/updatelead/".concat(data.lead.id, "/description/").concat(data.value); // console.log(url)

      _axios["default"].put(url, config).then(function (response) {
        if (response.status == 200) context.commit('UPDATE_LEAD', data);
      });
    },
    otherAction: function otherAction(context, type) {
      context;
      type;
      return true;
    },
    socket_userMessage: function socket_userMessage(context, message) {
      context.dispatch('newMessage', message);
      context.commit('NEW_MESSAGE_RECEIVED', message);

      if (message.is_important) {
        context.dispatch('alertImportantMessage', message);
      }
    }
  }
});

exports["default"] = _default;