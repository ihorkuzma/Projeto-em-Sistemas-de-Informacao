package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.util.Log;

import com.example.restaurante.modelo.Cliente;
import org.json.JSONException;
import org.json.JSONObject;

public class ClienteJsonParser {
    public static Cliente parserJsonCliente(String response, Context context){

        Cliente cliente=null;
        try{

            JSONObject jsonObject = new JSONObject(response);

            int id= jsonObject.getInt("id");
            String nome= jsonObject.getString("Nome");
            String telemovel= jsonObject.getString("Telemovel");
            String morada= jsonObject.getString("Morada");
            cliente=new Cliente(id, nome, telemovel, morada);
        }catch (JSONException e){
            e.printStackTrace();
        }
        return cliente;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }
}
