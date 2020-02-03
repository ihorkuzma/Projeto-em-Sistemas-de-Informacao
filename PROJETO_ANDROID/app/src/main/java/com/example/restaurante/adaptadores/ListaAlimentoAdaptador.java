package com.example.restaurante.adaptadores;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.restaurante.R;
import com.example.restaurante.modelo.Alimento;

import java.util.ArrayList;

public class ListaAlimentoAdaptador extends BaseAdapter {

    private Context context;
    private LayoutInflater layoutInflater;
    private ArrayList<Alimento> alimentos;

    public ListaAlimentoAdaptador(Context context, ArrayList<Alimento> alimentos){
        this.context = context;
        this.alimentos = alimentos;
    }

    @Override
    public int getCount() {
        return alimentos.size();
    }

    @Override
    public Object getItem(int i) {
        return alimentos.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {

        if (layoutInflater == null)
            layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        if (view == null)
            view = layoutInflater.inflate(R.layout.item_lista_alimento, null);

        ViewHolderLista viewHolder = (ViewHolderLista) view.getTag();
        if (viewHolder==null){
            viewHolder=new ViewHolderLista(view);
            view.setTag(viewHolder);
        }
        viewHolder.update(i);

        return view;
    }

    private class ViewHolderLista{


        private TextView tvNome, tvPreco;

        public ViewHolderLista(View view) {
            tvNome =view.findViewById(R.id.tv_nome);
            tvPreco =view.findViewById(R.id.tv_preco);
        }
        public void update(int position) {
            Alimento alimento = alimentos.get(position);
            tvNome.setText(alimento.getNome_alimento());
            tvPreco.setText(alimento.getPreco_alimento()+"");
        }
    }
}
