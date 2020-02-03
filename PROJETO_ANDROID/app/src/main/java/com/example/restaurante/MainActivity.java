package com.example.restaurante;

import androidx.annotation.Nullable;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;

import com.example.restaurante.vistas.ComidasFragment;
import com.example.restaurante.vistas.PerfilFragment;
import com.example.restaurante.vistas.ReservasFragment;
import com.google.android.material.navigation.NavigationView;

public class MainActivity extends AppCompatActivity implements NavigationView.OnNavigationItemSelectedListener{

    private static final String INFO_USER = "user";
    private NavigationView navigationView;
    private DrawerLayout drawer;
    private FragmentManager fragmentManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        Toolbar toolbar = findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);
        navigationView = findViewById(R.id.nav_view);
        drawer = findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(this, drawer,
                toolbar, R.string.navigation_drawer_open,
                R.string.navigation_drawer_close);
        toggle.syncState();
        drawer.addDrawerListener(toggle);
        navigationView.setNavigationItemSelectedListener(this);
        fragmentManager = getSupportFragmentManager();
        carregarFragmentoInicial();
    }

    private void carregarFragmentoInicial() {
        Fragment fragment = new PerfilFragment();
        setTitle(navigationView.getMenu().getItem(0).getTitle());
        navigationView.setCheckedItem(R.id.nav_perfil);
        fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
    }

    @Override
    public boolean onNavigationItemSelected(MenuItem menuItem) {
        // Handle navigation view item clicks here.
        Fragment fragment = null;
        switch (menuItem.getItemId()) {
            case R.id.nav_perfil:
                fragment= new PerfilFragment();
                setTitle(menuItem.getTitle());
                break;
            case R.id.nav_estatico:
                fragment= new ComidasFragment();
                setTitle(menuItem.getTitle());
                break;
            case R.id.nav_dinamico:
                fragment= new ReservasFragment();
                setTitle(menuItem.getTitle());
                break;
            case R.id.nav_logout:
                Intent intent = new Intent(this, MainActivity.class);
                startActivity(intent);
                finish();
                break;
            default:
                fragment=new PerfilFragment();
        }
        if (fragment != null)
            fragmentManager.beginTransaction().replace(R.id.contentFragment, fragment).commit();
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
    }
}
