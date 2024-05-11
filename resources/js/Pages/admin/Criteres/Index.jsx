import AdminLayout from '@/Layouts/AdminLayout.jsx';
import { Head } from '@inertiajs/react';
import React, { useState, useEffect } from 'react';
import {Inertia} from "@inertiajs/inertia";
import Formss from "@/Pages/admin/Criteres/CritereForms.jsx";

export default function Dashboard({ auth, criteres }) {

    const [isOverlayVisible, setIsOverlayVisible] = useState(false);
    const [currentId, setcurrentId] = useState(0);
    const [selectedcritere, setSelectedcritere] = useState(null);
    const toggleOverlay = () => {
        setIsOverlayVisible(!isOverlayVisible);
    };

    const handleDelete = (e, id) => {
        e.preventDefault();

        const userConfirmed = window.confirm(
            'Êtes-vous sûr de vouloir supprimer cet élément?'
        );

        if (userConfirmed) {
            Inertia.delete(`/criteres/${id}`); // Utilisation d'Inertia.js pour la redirection
        }
    };



    const handleEditClick = (critere) => {
        setSelectedcritere(critere);
        setcurrentId(critere.id) ;
        setIsOverlayVisible(true);
    };


    const handleAddNewClick = () => {
        setSelectedcritere(null);
        setcurrentId(null) ;
        setIsOverlayVisible(true);
    };

    return (
        <AdminLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Liste des Utilisateurs" />


            <div className="py-4">
                <h1> Liste des Criteres</h1>

                <div className="py-4">
                    <button onClick={handleAddNewClick}

                            className="group relative h-12 w-48 overflow-hidden rounded-2xl bg-blue-500 text-lg font-bold text-white">
                        Add Critere
                        <div
                            className="absolute inset-0 h-full w-full scale-0 rounded-2xl transition-all duration-300 group-hover:scale-100 group-hover:bg-white/30"></div>
                    </button>
                </div>

                <div className="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table className="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead className="bg-gray-50">
                        <tr>
                            <th scope="col" className="px-6 py-4 font-medium text-gray-900">N</th>
                            <th scope="col" className="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" className="px-6 py-4 font-medium text-gray-900"> Description</th>
                            <th scope="col" className="px-6 py-4 font-medium text-gray-900">weight</th>
                            <th scope="col" className="px-6 py-4 font-medium text-gray-900"></th>
                        </tr>
                        </thead>
                        <tbody className="divide-y divide-gray-100 border-t border-gray-100">
                        {criteres.map((critere, n) => (
                            <tr className="hover:bg-gray-50">
                                <td className="px-6 py-4">{n + 1}</td>
                                <td className="px-6 py-4">{critere.name}</td>
                                <td className="px-6 py-4">{critere.description}</td>
                                <td className="px-6 py-4">{critere.weight}</td>
                                <td className="px-6 py-4">
                                    <div className="flex justify-end gap-4">
                                        <a x-data="{ tooltip: 'Delete' }" href="#"
                                           onClick={(e) => handleDelete(e, critere.id)}>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                className="h-6 w-6"
                                                x-tooltip="tooltip"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                                />
                                            </svg>
                                        </a>
                                        <a x-data="{ tooltip: 'Edite' }" href="#"
                                           onClick={() => handleEditClick(critere)}>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                className="h-6 w-6"
                                                x-tooltip="tooltip"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        ))}
                        </tbody>
                    </table>
                </div>
            </div>
            {isOverlayVisible && (
                <div
                    className="absolute inset-0 bg-black bg-opacity-50 z-10 flex items-center justify-center transition-opacity duration-300"
                    onClick={toggleOverlay}
                >
                    <div
                        className="p-6 bg-white shadow-lg rounded-lg"
                        onClick={(event) => event.stopPropagation()}
                    >
                        <Formss critere={selectedcritere} id={currentId}>

                        </Formss>

                    </div>
                </div>
            )}

        </AdminLayout>
    );
}



