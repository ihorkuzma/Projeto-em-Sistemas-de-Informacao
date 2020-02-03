package com.example.restaurante.modelo;

import android.app.Activity;
import android.content.Context;
import android.content.SharedPreferences;

public class SharedPreferencesGestor {

    public static final String MyPREFERENCES = "MyPrefs" ;
    private static SharedPreferences sharedpreferences;

    public static void iniciar(Context context){
        sharedpreferences = context.getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE);
    }

    public static void write(String key, String value){
        SharedPreferences.Editor sprefs = sharedpreferences.edit();
        sprefs.putString(key, value);
        sprefs.apply();
    }
}
