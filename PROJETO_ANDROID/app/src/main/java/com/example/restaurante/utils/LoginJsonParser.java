package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.util.Log;

import com.example.restaurante.modelo.Cliente;
import com.example.restaurante.modelo.Utilizador;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class LoginJsonParser {

   public static Utilizador parserJsonLogin(String response, Context context){
       Utilizador utilizador=null;
        try{
            JSONObject jsonObject = new JSONObject(response);
            JSONObject user = jsonObject.getJSONObject("user");
            String username= user.getString("username");
            String token= user.getString("auth_key");
            String email= user.getString("email");
            utilizador=new Utilizador(username,token,email);
        }catch (JSONException e){
            e.printStackTrace();
        }
        return utilizador;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }
}
