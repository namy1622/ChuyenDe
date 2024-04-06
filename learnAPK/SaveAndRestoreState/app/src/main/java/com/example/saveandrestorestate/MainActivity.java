package com.example.saveandrestorestate;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.PersistableBundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Button;

import android.os.Bundle;

public class MainActivity extends AppCompatActivity {

    TextView message;
    Button button;

    private int m_lession = 1;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);



        message = findViewById(R.id.message);
        button = findViewById(R.id.button);

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                m_lession++;
                button.setBackgroundColor(Color.CYAN);
                setMessage();
            }
        });

        setMessage();
    }

    private void setMessage(){
        message.setText("Bai hoc so: "+ m_lession);
    }


    @Override
    protected void onRestoreInstanceState(@NonNull Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);

            m_lession = savedInstanceState.getInt("baihoc");
            int c = savedInstanceState.getInt("color");
            button.setBackgroundColor(c);

            setMessage();
    }

    @Override
    public void onSaveInstanceState(@NonNull Bundle outState ) {
        super.onSaveInstanceState(outState);

        ColorDrawable color = (ColorDrawable) button.getBackground();
        int mamau = color.getColor();
        outState.putInt("baihoc", m_lession);

        outState.putInt("color",mamau);
    }
}
