# 📘 Maquetación con CSS Flexbox (con comentarios)

## Estructura HTML con comentarios

```html
<!-- Contenedor principal de la página -->
<div class="contenedor">
  <!-- Cabecera de la página -->
  <header>Header</header>

  <!-- Zona central que contendrá el contenido y la barra lateral -->
  <div class="contenido">
    <!-- Contenido principal -->
    <main>Main</main>

    <!-- Barra lateral -->
    <aside>Aside</aside>
  </div>

  <!-- Pie de página -->
  <footer>Footer</footer>
</div>
```

## CSS del contenedor principal

```css
.contenedor {
  display: flex;              /* Activa Flexbox */
  flex-direction: column;     /* Ordena los hijos en columna (vertical) */
  min-height: 100vh;          /* Ocupa toda la altura de la pantalla */
}
```

## CSS de la zona de contenido

```css
.contenido {
  display: flex;      /* Convierte este bloque en contenedor flex */
  flex: 1;             /* Ocupa el espacio sobrante entre header y footer */
  gap: 10px;           /* Espacio entre main y aside */
}
```

## CSS de los elementos hijos

```css
main {
  flex: 3;            /* Ocupa más espacio que el aside */
  padding: 20px;       /* Espaciado interno */
}

aside {
  flex: 1;            /* Ocupa menos espacio que main */
  padding: 20px;       /* Espaciado interno */
}

header, footer {
  padding: 10px;       /* Espaciado interno */
}
```

## Propiedades habituales de Flexbox (con explicación)

```css
.contenedor-flex {
  display: flex;                /* Activa el modo flex */
  flex-direction: row;          /* Dirección horizontal */
  flex-wrap: wrap;              /* Permite que los elementos hagan salto de línea */
  justify-content: center;      /* Alinea horizontalmente los elementos */
  align-items: center;          /* Alinea verticalmente los elementos */
  align-content: space-around;  /* Distribuye el espacio entre filas */
  gap: 10px 20px;               /* Espaciado entre filas y columnas */
}
```
