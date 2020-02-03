package com.example.restaurante.modelo;

public class Utilizador {
    private String username, token, email;

    public Utilizador(String username, String token, String email) {
        this.username = username;
        this.token = token;
        this.email = email;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getToken() {
        return token;
    }

    public void setToken(String token) {
        this.token = token;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
