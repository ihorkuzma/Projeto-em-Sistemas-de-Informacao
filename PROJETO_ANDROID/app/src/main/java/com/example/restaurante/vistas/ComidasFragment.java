package com.example.restaurante.vistas;


import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.SearchView;

import com.example.restaurante.R;
import com.example.restaurante.adaptadores.ListaAlimentoAdaptador;
import com.example.restaurante.listeners.AlimentoListener;
import com.example.restaurante.modelo.Alimento;
import com.example.restaurante.modelo.SingletonGestorRestaurante;
import com.example.restaurante.utils.AlimentosJsonParser;
import com.example.restaurante.utils.ReservaListaJsonParser;

import java.util.ArrayList;

/**
 * A simple {@link Fragment} subclass.
 */
public class ComidasFragment extends Fragment implements AlimentoListener{

    public static final String MyPREFERENCES = "MyPrefs" ;
    private ListView lvListaAlimentos;
    private ArrayList<Alimento> alimentos;
    private SearchView searchView;
    private ListaAlimentoAdaptador listaAlimentoAdaptador;

    public ComidasFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_comidas, container, false);
        setHasOptionsMenu(true);
        lvListaAlimentos = view.findViewById(R.id.lvListaAlimentos);
        SingletonGestorRestaurante.getInstance(getContext()).setAlimentosListener((AlimentoListener) this);

        lvListaAlimentos.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

                dialogAdicionar(alimentos.get(position).getId_alimento());
            }
        });

        return view;
    }


    //CARREGAR O MENU
    @Override
    public void onCreateOptionsMenu(@NonNull Menu menu, @NonNull MenuInflater inflater) {
        inflater.inflate(R.menu.menu_pesquisa,menu);
        MenuItem itemPesquisa=menu.findItem(R.id.itemPesquisa);
        searchView=(SearchView) itemPesquisa.getActionView();
        searchView.setOnQueryTextListener(new SearchView.OnQueryTextListener() {
            @Override
            public boolean onQueryTextSubmit(String query) {
                return false;
            }

            @Override
            public boolean onQueryTextChange(String newText) {
                ArrayList<Alimento> filtrarListaAlimentos=new ArrayList<>();
                for (Alimento alimento:SingletonGestorRestaurante.getInstance(getContext()).getAlimentoBD())
                    if (alimento.getNome_alimento().toLowerCase().contains(newText.toLowerCase()))
                        filtrarListaAlimentos.add(alimento);
                lvListaAlimentos.setAdapter(new ListaAlimentoAdaptador(getContext(),filtrarListaAlimentos));
                return true;
            }
        });
        super.onCreateOptionsMenu(menu,inflater);
    }
    //IDENTIFICAR O ITEM DO MENU Q FOI SELECIONADO
    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onResume() {
        super.onResume();
        SingletonGestorRestaurante.getInstance(getContext()).getAllAlimentosAPI(getContext(), AlimentosJsonParser.isConnectionInternet(getContext()));
        if (searchView!=null)
            searchView.onActionViewCollapsed();
    }

    @Override
    public void onRefreshListaAlimentos(ArrayList<Alimento> listaAlimentos) {
        listaAlimentoAdaptador=new ListaAlimentoAdaptador(getContext(), listaAlimentos);
        lvListaAlimentos.setAdapter(listaAlimentoAdaptador);

        this.alimentos = listaAlimentos;
    }

    private void dialogAdicionar(final int id) {
        final String token = getContext().getSharedPreferences(MyPREFERENCES, Activity.MODE_PRIVATE).getString("token", "");
        AlertDialog.Builder builder=new AlertDialog.Builder(getContext());
        builder.setTitle("Fazer Pedido")
                .setMessage("Pretende mesmo fazer pedido?")
                .setPositiveButton("OK", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        SingletonGestorRestaurante.getInstance(getContext()).pedidoAPI(getContext(), AlimentosJsonParser.isConnectionInternet(getContext()), token, id);
                    }
                })
                .setNegativeButton("Cancel", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                })
                .show();
    }
}
