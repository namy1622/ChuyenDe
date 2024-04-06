package com.example.imagebutton_demo;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.content.res.AppCompatResources;

import android.graphics.drawable.Drawable;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;

public class MainActivity extends AppCompatActivity {
    ImageView imageview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        imageview = findViewById(R.id.image);

        imageview.setScaleType(ImageView.ScaleType.FIT_END);

        imageview.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Drawable img;
                img = AppCompatResources.getDrawable(MainActivity.this, R.drawable.bg_loli2);

                imageview.setImageDrawable(img);
            }
        });


    }
}