import "./bootstrap";
import Alpine from "alpinejs";
import axios from "axios";

axios.defaults.baseURL = "http://localhost:8000/api";

window.Alpine = Alpine;
Alpine.store("user", {
    authenticated: false,
    data: null,
    posyandu: null,
    token: null,
    setUser(userData) {
        console.log(userData);
        this.authenticated = true;
        this.data = userData;
        // Store User Data
        localStorage.setItem("userData", JSON.stringify(userData));
    },
    setPosyandu(posyanduData) {
        this.posyandu = posyanduData;
        // Store Posyandu Data
        localStorage.setItem("posyanduData", JSON.stringify(posyanduData));
    },
    setToken(token) {
        this.token = token;
        console.log(token);
        // Store the token in localStorage
        localStorage.setItem("authToken", token);

        this.authenticated = true;
        axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    },
    clearUser() {
        this.authenticated = false;
        this.data = null;
        this.posyandu = null;
        this.token = null;
        // Remove the token from localStorage
        localStorage.removeItem("authToken");
        localStorage.removeItem("userData");
        localStorage.removeItem("posyanduData");
        // Remove the Authorization header for Axios
        delete axios.defaults.headers.common["Authorization"];
    },
    async loadUser() {
        const cachedUser = localStorage.getItem("userData");
        const cachedToken = localStorage.getItem("authToken");
        const cachedPosyandu = localStorage.getItem("posyanduData");

        if (cachedUser && cachedToken) {
            this.authenticated = true;
            this.data = JSON.parse(cachedUser);
            this.token = cachedToken;
            this.posyandu = JSON.parse(cachedPosyandu);
            console.log("posyandu", this.posyandu);
            axios.defaults.headers.common[
                "Authorization"
            ] = `Bearer ${cachedToken}`;
        } else if (cachedToken) {
            // if login and save data user to local storage
            try {
                const getUser = await axios.get("/user");
                this.setUser(getUser.data);
            } catch (error) {
                console.error("Error fetching user data:", error);
                this.clearUser();
                window.location.href = "/login";
            }
        } else {
            this.clearUser();
            window.location.href = "/login";
        }
    },

    authCheck(status) {
        if (status == 401) {
            // Jika status 401, berarti token tidak valid atau sudah kadaluarsa
            this.clearUser();
            window.location.href = "/users/login";
            return;
        }
        if (status == 403) {
            window.location.href = "/home";
            return;
        }
    },
});

Alpine.start();
