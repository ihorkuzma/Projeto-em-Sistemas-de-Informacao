package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

import com.example.restaurante.modelo.Alimento;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class AlimentosJsonParser {
    public static ArrayList<Alimento> parserJsonAlimentos(JSONArray response, Context context){
        ArrayList<Alimento> listaAlimentos= new ArrayList<>();
        try{
            for (int i=0; i<response.length(); i++){
                JSONObject alimento = (JSONObject)response.get(i);
                int idAlimento=alimento.getInt("id");
                String nome=alimento.getString("Nome_alimento");
                int preco=alimento.getInt("Preco");

                Alimento auxAlimento = new Alimento(idAlimento, nome, preco);
                listaAlimentos.add(auxAlimento);
            }
        }catch (JSONException e){
            e.printStackTrace();
        }
        return listaAlimentos;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }
}
