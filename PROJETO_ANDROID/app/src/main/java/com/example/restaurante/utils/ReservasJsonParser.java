package com.example.restaurante.utils;

import android.content.Context;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.util.Log;


import com.example.restaurante.modelo.Reserva;

import org.json.JSONException;
import org.json.JSONObject;

public class ReservasJsonParser {

    public static Reserva parserJsonReserva(String response, Context context){
        Reserva reserva=null;
        try{

            JSONObject jsonObject = new JSONObject(response);

            int id= jsonObject.getInt("id");
            String NPessoasAsString= jsonObject.getString("Numero_pessoas");
            int NPessoas = Integer.parseInt(NPessoasAsString);
            int ClienteId= jsonObject.getInt("Cliente_id");
            String DataReserva= jsonObject.getString("Data_reserva");
            reserva=new Reserva(id, NPessoas, ClienteId,DataReserva);
        }catch (JSONException e){
            e.printStackTrace();
        }
        return reserva;
    }

    public static boolean isConnectionInternet(Context context){
        ConnectivityManager cm= (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo nInfo=cm.getActiveNetworkInfo();
        return nInfo!=null && nInfo.isConnected();
    }

}
