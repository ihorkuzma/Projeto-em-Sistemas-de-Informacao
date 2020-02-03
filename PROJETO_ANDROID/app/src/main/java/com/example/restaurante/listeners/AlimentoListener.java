package com.example.restaurante.listeners;

import com.example.restaurante.modelo.Alimento;

import java.util.ArrayList;

public interface AlimentoListener {
    void onRefreshListaAlimentos(ArrayList<Alimento> listaAlimentos);
}
