package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

import com.example.restaurante.modelo.Linhavenda;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class LinhavendaListaJsonParser {
    public static ArrayList<Linhavenda> parserJsonListaLinhavendas(JSONArray response, Context context){
        ArrayList<Linhavenda> listaLinhavendas= new ArrayList<>();
        try{
            for (int i=0; i<response.length(); i++){
                JSONObject linhavenda = (JSONObject)response.get(i);
                int idLinhavenda=linhavenda.getInt("id");
                int quantidade=linhavenda.getInt("quantidade");
                String nomeAlimento=linhavenda.getString("Nome_alimento");


                Linhavenda auxLinhavenda = new Linhavenda(idLinhavenda, quantidade, nomeAlimento);
                listaLinhavendas.add(auxLinhavenda);
            }
        }catch (JSONException e){
            e.printStackTrace();
        }
        return listaLinhavendas;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }
}
