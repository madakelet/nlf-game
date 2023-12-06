export const checkAuth = async () => {
    var isAuthenticated = false;
    await axios
        .get("/api/authenticate")
        .then(() => {
            isAuthenticated = true;
        })
        .catch(() => {});
  
    return isAuthenticated;
  };

  export const checkAdmin = async () => {
    var isAdmin = false;
    await axios
        .get("/api/authenticate-admin")
        .then(() => {
            isAdmin = true;
        })
        .catch(() => {});
  
    return isAdmin;
  };