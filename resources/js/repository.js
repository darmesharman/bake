import axios from "axios";


export default {
      data() {
        return {
          session:null,
          login:null
        }
    },
    createSession() {
     
    },
  
    login(params) {
      let url = 'http://localhost:8000/api/auth';
      let config = {'headers': {
        'Accept': 'application/json',
        'x-csrf-token': params.token
      }
      
      }
      let data = params.data
      
      axios.post(url, data, config).then(response=> {this.login = response});
      
      // return api.post('http://localhost:8000/api/auth', params);

    },
  
    logout() {
      return api.delete('http://localhost:8000/logout');
    },
  
    getPosts() {
      return api.get(`http://localhost:8000/api/posts`);
    },
  };