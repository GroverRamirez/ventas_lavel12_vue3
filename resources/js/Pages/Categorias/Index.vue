<template>
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Lista de Categorías</h1>
      <Link :href="route('categorias.create')" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Crear Categoría
      </Link>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Productos</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr v-for="categoria in categorias.data" :key="categoria.id">
            <td class="px-6 py-4 whitespace-nowrap">{{ categoria.nombre }}</td>
            <td class="px-6 py-4">{{ categoria.descripcion }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ categoria.productos_count }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <Link :href="route('categorias.show', categoria.id)" class="text-blue-600 hover:text-blue-900 mr-3">
                Ver
              </Link>
              <Link :href="route('categorias.edit', categoria.id)" class="text-indigo-600 hover:text-indigo-900 mr-3">
                Editar
              </Link>
              <button @click="confirmDelete(categoria)" class="text-red-600 hover:text-red-900">
                Eliminar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      <Pagination :links="categorias.links" />
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import Pagination from '@/components/Pagination.vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';

defineProps({
  categorias: Object
});

const confirmDelete = (categoria) => {
  if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
    router.delete(route('categorias.destroy', categoria.id));
  }
};
</script>

<script>
export default {
  layout: AppLayout
}
</script> 