package com.example.restaurante;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.restaurante.listeners.LoginListener;
import com.example.restaurante.modelo.SharedPreferencesGestor;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.modelo.Utilizador;
import com.example.restaurante.utils.LoginJsonParser;

public class LoginActivity extends AppCompatActivity implements LoginListener {

    EditText etUsername, etPassword;
    Button btnLogin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        etUsername = (EditText) findViewById(R.id.LoginUsername);
        etPassword = (EditText) findViewById(R.id.LoginPassword);
        btnLogin = (Button) findViewById(R.id.LoginButton);
        SingletonGestorRestaurante.getInstance(getApplicationContext()).setLoginListener(this);
    }

    public void onClickLogin(View view) {
        String username = etUsername.getText().toString();
        String password = etPassword.getText().toString();
        if (etUsername.length() == 0 || etPassword.length() == 0){
            Toast.makeText(getApplicationContext(), "Algo esta errado. Por favor, verifique o Username ou Password.", Toast.LENGTH_LONG).show();
        }else{
            //se tiver vai fazer pedido à API
            SingletonGestorRestaurante.getInstance(getApplicationContext()).getTokenAPI(getApplicationContext(), LoginJsonParser.isConnectionInternet(getApplicationContext()),username,password);
        }
    }


    @Override
    public void onRefreshLogin(Utilizador utilizador) {
        if (utilizador != null) {
            //guardar no shared
            SharedPreferencesGestor.iniciar(getApplicationContext());
            SharedPreferencesGestor.write("token", utilizador.getToken());
            SharedPreferencesGestor.write("name",utilizador.getUsername());
            SharedPreferencesGestor.write("email",utilizador.getEmail());
            Log.i("USERNAME", utilizador.getUsername());
            Log.i("EMAIL", utilizador.getEmail());
            Log.i("TOKEN", utilizador.getToken());
            Intent intent = new Intent(this, MainActivity.class);
            startActivity(intent);
        } else
            Toast.makeText(getApplicationContext(), "Login Invalido", Toast.LENGTH_SHORT).show();
    }
}
