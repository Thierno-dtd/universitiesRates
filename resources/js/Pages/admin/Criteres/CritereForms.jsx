import React, { useState, useEffect } from 'react';
import {Inertia} from "@inertiajs/inertia";
import {router} from "@inertiajs/react";

export default function Formss({ critere, id}) {
    const [formData, setFormData] = useState({
        name: '',
        description: '',
        weight: '',
        id: id ?? null,
    });

    useEffect(() => {
        if (critere) {
            setFormData({
                name: critere.name || '',
                description: critere.description || '',
                weight: critere.weight || 0.0,

            });
        }
    }, [critere]);

    const handleChange = (e) => {
        const { name, value, type, checked } = e.target;

        const newValue = type === 'checkbox' ? checked : value;

        setFormData({
            ...formData,
            [name]: newValue,
        });
    };

    function handleSubmit(e) {
        e.preventDefault()

        if (id === null) {
            Inertia.post('/criteres', formData);
        } else {
            Inertia.put(`/criteres/${id}`, formData);
        }
    }

    return (
        <form onSubmit={handleSubmit}>
            <div className="space-y-12 flex flex-1 w-full">
                <div className="border-b border-gray-900/10 pb-12">
                    <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div className="col-span-full">
                            <label htmlFor="name" className="block text-sm font-medium leading-6 text-gray-900">
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
                            <label htmlFor="weight" className="block text-sm font-medium leading-6 text-gray-900">
                                weight
                            </label>
                            <div className="mt-2">
                                <input
                                    type="number"
                                    name="weight"
                                    id="postal-code"
                                    min={0}
                                    step={0.1}
                                    value={formData.weight}
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
