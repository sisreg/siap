
        function limpiar_nombres(text) {
            var text = text.toLowerCase(); // a minusculas
            text = text.replace(/[áàäâå]/, 'a');
            text = text.replace(/[éèëê]/, 'e');
            text = text.replace(/[íìïî]/, 'i');
            text = text.replace(/[óòöô]/, 'o');
            text = text.replace(/[úùüû]/, 'u');
           text = text.replace(/[ýÿ]/, 'y');
           text = text.replace(/[^a-zA-ZñÑ\s]/g, '');
           text = text.toUpperCase();
           return text;
       }

