"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const stylistsData = [
  {
    id: 1,
    image: "/images/user-108.png",
    name: "Zinia Anderson",
    totalBookings: 2032,
    rating: 5.0,
  },
  {
    id: 2,
    image: "/images/user-109.png",
    name: "Angela Carter",
    totalBookings: 1020,
    rating: 4.9,
  },
  {
    id: 3,
    image: "/images/user-110.png",
    name: "Skyler White",
    totalBookings: 99,
    rating: 4.8,
  },
  {
    id: 4,
    image: "/images/user-111.png",
    name: "Jane Ronan",
    totalBookings: 89,
    rating: 4.5,
  },
  {
    id: 5,
    image: "/images/user-112.png",
    name: "Angel Peril",
    totalBookings: 72,
    rating: 4.3,
  },
];

const TopStylistPerformance = () => {
  // Function to render star icons based on rating
  const renderStars = (rating) => {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 !== 0;
    const stars = [];

    for (let i = 0; i < fullStars; i++) {
      stars.push(<i key={i} className="ri-star-fill text-warning"></i>);
    }

    if (hasHalfStar) {
      stars.push(<i key="half" className="ri-star-half-line text-warning"></i>);
    }

    // Fill the remaining stars with empty stars if needed
    const remainingStars = 5 - stars.length;
    for (let i = 0; i < remainingStars; i++) {
      stars.push(
        <i key={`empty-${i}`} className="ri-star-line text-warning"></i>
      );
    }

    return stars;
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <h3 className="mb-4">Top Stylist Performance</h3>

        <div>
          {stylistsData.map((stylist) => (
            <div
              key={stylist.id}
              className="d-flex flex-wrap gap-2 justify-content-between align-items-center border-bottom lcbmp-none"
              style={{
                marginBottom: "14px",
                paddingBottom: "14px",
              }}
            >
              <div className="d-flex align-items-center gap-3">
                <div className="flex-shrink-0">
                  <Image
                    src={stylist.image}
                    className="rounded-3"
                    alt={stylist.name}
                    width={32}
                    height={32}
                  />
                </div>
                <div className="flex-grow-1">
                  <h4 className="fs-14 fw-semibold mb-0">{stylist.name}</h4>
                  <span className="fs-12">
                    <span className="fw-bold">{stylist.totalBookings}</span>{" "}
                    Total Bookings
                  </span>
                </div>
              </div>

              <div className="d-flex align-items-center gap-1">
                {renderStars(stylist.rating)}
                <span className="fs-12 position-relative top-1">
                  {stylist.rating}
                </span>
              </div>
            </div>
          ))}
        </div>
      </Card>
    </>
  );
};

export default TopStylistPerformance;
