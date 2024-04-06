package com.example.learnactivity_2;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class Activity_1 extends AppCompatActivity {

    TextView textView;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.layout_activity1);

        textView = findViewById(R.id.textView);
        //       textView.setText("nam");
        //      String s = textView.getText().toString();

        Button button = findViewById(R.id.button1);
        button.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                Toast.makeText(Activity_1.this,
//                        "AAA",
//                        Toast.LENGTH_SHORT).show();
                Intent i = new Intent();
                i.setClass(Activity_1.this , Activity2.class);

                String s = textView.getText().toString();
                i.putExtra("dulieu", s);

                startActivity(i);

                startActivityForResult(i, Activity2.TRAVE_ACTIVITY2);
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if(requestCode == Activity2.TRAVE_ACTIVITY2){
            String s = data.getStringExtra("dulieu");
            textView.setText(s);
        }
    }
}
