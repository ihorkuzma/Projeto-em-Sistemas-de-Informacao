package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;

import com.example.restaurante.modelo.Reserva;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class ReservaListaJsonParser {
    public static ArrayList<Reserva> parserJsonListaReservas(JSONArray response, Context context){
        ArrayList<Reserva> listaReservas= new ArrayList<>();
        try{
            for (int i=0; i<response.length(); i++){
                JSONObject reserva = (JSONObject)response.get(i);
                int idReserva=reserva.getInt("id");
                String NPessoasAsString= reserva.getString("Numero_pessoas");
                int NPessoas = Integer.parseInt(NPessoasAsString);
                int Cliente_id=reserva.getInt("Cliente_id");
                String Data_reserva=reserva.getString("Data_reserva");

                Reserva auxReserva = new Reserva(idReserva, NPessoas, Cliente_id, Data_reserva);
                listaReservas.add(auxReserva);
            }
        }catch (JSONException e){
            e.printStackTrace();
        }
        return listaReservas;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }
}
