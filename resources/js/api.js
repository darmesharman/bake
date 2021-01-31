export default {
    createSession() {
      return api.get('http://localhost:8000/sanctum/csrf-cookie');
    },
  
    login(params) {
      return api.post('http://localhost:8000/login', params);
    },
  
    logout() {
      return api.delete('http://localhost:8000/logout');
    },
  
    getPosts() {
      return api.get(`http://localhost:8000/api/posts`);
    },
  };