package com.example.restaurante.listeners;

import com.example.restaurante.modelo.Reserva;

import java.util.ArrayList;

public interface ReservaListaListener {
    void onRefreshListaReservas(ArrayList<Reserva> listaReservas);

}
