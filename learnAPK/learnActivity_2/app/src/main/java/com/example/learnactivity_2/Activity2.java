package com.example.learnactivity_2;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.example.learnactivity_2.R;

public class Activity2 extends AppCompatActivity {

    public static int TRAVE_ACTIVITY2 = 1000;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.layout_activity2);

        Intent i = getIntent();

        EditText editText = findViewById(R.id.editText2);
  //      editText.setText("");
  //     String s=  editText.getText().toString();

        String dulieu = i.getStringExtra("dulieu");
        editText.setText(dulieu);

        Button button = findViewById(R.id.button2);

        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                ///

                Intent i =  new Intent();
                String s= editText.getText().toString();
                i.putExtra("dulieu", s);
                setResult(TRAVE_ACTIVITY2, i);

                finish();

            }
        });
    }
}
