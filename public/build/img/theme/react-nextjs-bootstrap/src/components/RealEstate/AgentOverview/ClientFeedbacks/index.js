"use client";

import { Button } from "react-bootstrap";
import Image from "next/image";
import { useState } from "react";

const ClientFeedbacks = () => {
  const reviews = [
    {
      name: "Irene George",
      timeAgo: "15m ago",
      rating: 5,
      review:
        "Great service! Found exactly what I needed for my property, and the process was smooth and hassle-free.",
      image: "/images/user-48.jpg",
    },
    {
      name: "John Doe",
      timeAgo: "1h ago",
      rating: 4,
      review:
        "Helpful staff and efficient service, though I had to wait a bit longer than expected.",
      image: "/images/user-49.jpg",
    },
    {
      name: "Sarah Brown",
      timeAgo: "2h ago",
      rating: 3,
      review: "Good experience overall, but there's room for improvement.",
      image: "/images/user-50.jpg",
    },
    {
      name: "Michael Scott",
      timeAgo: "3h ago",
      rating: 2,
      review:
        "The service could have been better. Encountered some delays. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
      image: "/images/user-51.jpg",
    },
    {
      name: "Emily Davis",
      timeAgo: "1d ago",
      rating: 1,
      review:
        "Disappointing experience. The process was too complicated. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
      image: "/images/user-52.jpg",
    },
    {
      name: "Irene George",
      timeAgo: "15m ago",
      rating: 5,
      review:
        "Great service! Found exactly what I needed for my property, and the process was smooth and hassle-free.",
      image: "/images/user-48.jpg",
    },
    {
      name: "Michael Scott",
      timeAgo: "3h ago",
      rating: 2,
      review:
        "The service could have been better. Encountered some delays. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
      image: "/images/user-51.jpg",
    },
    {
      name: "John Doe",
      timeAgo: "1h ago",
      rating: 4,
      review:
        "Helpful staff and efficient service, though I had to wait a bit longer than expected.",
      image: "/images/user-49.jpg",
    },
    {
      name: "Sarah Brown",
      timeAgo: "2h ago",
      rating: 3,
      review: "Good experience overall, but there's room for improvement.",
      image: "/images/user-50.jpg",
    },
    {
      name: "Emily Davis",
      timeAgo: "1d ago",
      rating: 1,
      review:
        "Disappointing experience. The process was too complicated. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
      image: "/images/user-52.jpg",
    },
  ];

  const [currentPage, setCurrentPage] = useState(1);
  const reviewsPerPage = 5; // Number of reviews per page

  // Calculate total pages
  const totalPages = Math.ceil(reviews.length / reviewsPerPage);

  // Calculate the reviews to display on the current page
  const indexOfLastReview = currentPage * reviewsPerPage;
  const indexOfFirstReview = indexOfLastReview - reviewsPerPage;
  const currentReviews = reviews.slice(indexOfFirstReview, indexOfLastReview);

  // Function to handle page changes
  const handlePageChange = (pageNumber) => {
    setCurrentPage(pageNumber);
  };

  return (
    <>
      <h3 className="mb-3">Client Feedbacks</h3>

      <div className="mb-4">
        {currentReviews.map((review, index) => (
          <div className="mb-4" key={index}>
            <div className="d-flex align-items-center mb-2">
              <div className="flex-shrink-0">
                <Image
                  src={review.image}
                  className="rounded-circle"
                  alt={review.name.toLowerCase()}
                  width={40}
                  height={40}
                />
              </div>
              <div className="flex-grow-1 ms-2">
                <div className="d-flex flex-wrap gap-2 justify-content-between">
                  <div>
                    <h4 className="fs-15 mb-0 fw-semibold">{review.name}</h4>
                    <span className="fs-12">{review.timeAgo}</span>
                  </div>
                  <div className="d-flex gap-1">
                    {[...Array(5)].map((_, i) => (
                      <i
                        key={i}
                        className={`ri-star${
                          i < review.rating ? "-fill" : "-line"
                        } text-warning fs-16`}
                      ></i>
                    ))}
                  </div>
                </div>
              </div>
            </div>
            <p className="fs-12" style={{ lineHeight: 1.4 }}>
              {review.review}
            </p>
          </div>
        ))}
      </div>

      <nav aria-label="Page navigation example">
        <ul className="pagination mb-0 justify-content-center">
          <li className={`page-item ${currentPage === 1 ? "disabled" : ""}`}>
            <Button
              className="page-link icon"
              onClick={() => handlePageChange(currentPage - 1)}
              disabled={currentPage === 1}
            >
              <i className="material-symbols-outlined">keyboard_arrow_left</i>
            </Button>
          </li>
          {[...Array(totalPages)].map((_, i) => (
            <li key={i} className="page-item">
              <Button
                className={`page-link ${currentPage === i + 1 ? "active" : ""}`}
                onClick={() => handlePageChange(i + 1)}
              >
                {i + 1}
              </Button>
            </li>
          ))}
          <li
            className={`page-item ${
              currentPage === totalPages ? "disabled" : ""
            }`}
          >
            <Button
              className="page-link icon"
              onClick={() => handlePageChange(currentPage + 1)}
              disabled={currentPage === totalPages}
            >
              <i className="material-symbols-outlined">keyboard_arrow_right</i>
            </Button>
          </li>
        </ul>
      </nav>
    </>
  );
};

export default ClientFeedbacks;
