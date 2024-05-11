import React, { useState, useEffect } from 'react';
import {Inertia} from "@inertiajs/inertia";
import {router} from "@inertiajs/react";

export default function Example({ university, id}) {
    const [formData, setFormData] = useState({
        name: '',
        website: '',
        image: '',
        description: '',
        location: '',
        haveFiliale: false,
        id: id ?? null,
    });

    useEffect(() => {
        if (university) {
            setFormData({
                name: university.name || '',
                website: university.website || '',
                image: university.image || '',
                description: university.description || '',
                location: university.location || '',
                haveFiliale: university.haveFiliale || false,
                id: id ?? null, // Utilisez `id` comme fourni
            });

        }
    }, [university, id]);


    const handleChange = (e) => {
        const { name, value, type, checked } = e.target;

        // Utilisez `checked` pour les checkboxes, sinon utilisez `value`
        const newValue = type === 'checkbox' ? checked : value;

        setFormData({
            ...formData, // Maintenir les valeurs actuelles
            [name]: newValue, // Mettre à jour la valeur appropriée
        });
    };

    function handleSubmit(e) {
        e.preventDefault()
        if (id === null) {
            Inertia.post('/universities', formData);
        } else {
            Inertia.put(`/universities/${id}`, formData);
        }
    }

    return (
        <form onSubmit={handleSubmit}>
            <div className="space-y-12 flex flex-1 w-full">
                <div className="border-b border-gray-900/10 pb-12">
                    <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div className="col-span-full">
                            <label htmlFor="name"    className="block text-sm font-medium leading-6 text-gray-900">
                                Name
                            </label>
                            <div className="mt-2">
                                <input
                                    type="text"
                                    name="name"
                                    value={formData.name}
                                    onChange={handleChange} // Gestionnaire de changement
                                    className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300"
                                />
                            </div>
                        </div>

                        <div className="col-span-full">
                            <label htmlFor="website" className="block text-sm font-medium leading-6 text-gray-900">
                                Website
                            </label>
                            <div className="mt-2">
                                <input
                                    type="text"
                                    name="website"
                                    value={formData.website}
                                    onChange={handleChange}
                                    className="block w-full"
                                />
                            </div>
                        </div>

                        <div className="col-span-full">
                            <label htmlFor="image" className="block text-sm font-medium leading-6 text-gray-900">
                                Image
                            </label>
                            <div className="mt-2">
                                <input
                                    type="text"
                                    name="image"
                                    value={formData.image}
                                    onChange={handleChange}
                                />
                            </div>
                        </div>

                        <div className="sm:col-span-3">
                            <label htmlFor="haveFiliale" className="block text-sm font-medium leading-6 text-gray-900">
                                Filiale
                            </label>
                            <input
                                type="checkbox"
                                name="haveFiliale"
                                checked={formData.haveFiliale}
                                onChange={handleChange}
                            />
                        </div>

                        <div className="col-span-full">
                            <label htmlFor="description" className="block text-sm font-medium leading-6 text-gray-900">
                                Description
                            </label>
                            <div className="mt-2">
                <textarea
                    name="description"
                    rows={3}
                    value={formData.description}
                    onChange={handleChange}
                    className="block w-full"
                />
                            </div>
                        </div>

                        <div className="sm:col-span-2">
                            <label htmlFor="location" className="block text-sm font-medium leading-6 text-gray-900">
                                location
                            </label>
                            <div className="mt-2">
                                <input
                                    type="text"
                                    name="location"
                                    id="postal-code"
                                    value={formData.location}
                                    onChange={handleChange}
                                    autoComplete="postal-code"
                                    className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="mt-6 flex items-center justify-end gap-x-6">
                <button type="reset" onClick={() => console.log('Cancel')} className="text-sm font-semibold">
                    Cancel
                </button>
                <button type="submit" className="bg-indigo-600 px-3 py-2 text-sm text-white">
                    Save
                </button>
            </div>
        </form>
    );
}
