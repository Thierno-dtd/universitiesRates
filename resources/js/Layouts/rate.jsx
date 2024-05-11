import React from 'react';

// Composant pour afficher des étoiles en fonction du rating
const StarRating = ({ rating }) => {
    const totalStars = 5; // Nombre total d'étoiles

    return (
        <div className="flex"> {/* Flex pour aligner les étoiles */}
            {Array.from({ length: totalStars }, (_, index) => (
                index < rating ? (
                    // Afficher des étoiles pleines
                    <svg
                        key={index}
                        xmlns="http://www.w3.org/2000/svg"
                        className="w-6 h-6 text-yellow-500" // Couleur jaune pour les étoiles pleines
                        fill="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path d="M12 .587l3.668 7.431 8.167 1.186-5.896 5.741 1.392 8.11L12 18.896l-7.331 3.859 1.392-8.11-5.896-5.741 8.167-1.186z" />
                    </svg>
                ) : (
                    // Afficher des étoiles vides
                    <svg
                        key={index}
                        xmlns="http://www.w3.org/2000/svg"
                        className="w-6 h-6 text-gray-300" // Couleur grise pour les étoiles vides
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        strokeWidth="2"
                    >
                        <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M12 2.5l3.09 6.26L22 10.13l-5.09 4.95 1.2 7.42-6.11-3.2L5.87 22.5l1.2-7.42L2 10.13l6.91-1.37L12 2.5z"
                        />
                    </svg>
                )
            ))}
        </div>
    );
};

export default StarRating;
