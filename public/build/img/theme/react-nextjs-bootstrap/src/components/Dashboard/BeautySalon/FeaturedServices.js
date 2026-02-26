"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const featuredServicesData = [
  {
    id: 1,
    image: "/images/featured-1.png",
    name: "Hair Cut",
    served: "132 Served this week",
    rank: "01",
  },
  {
    id: 2,
    image: "/images/featured-2.png",
    name: "Manicure",
    served: "102 Served this week",
    rank: "02",
  },
  {
    id: 3,
    image: "/images/featured-3.png",
    name: "Pedicure",
    served: "99 Served this week",
    rank: "03",
  },
  {
    id: 4,
    image: "/images/featured-4.png",
    name: "Nail Art",
    served: "89 Served this week",
    rank: "04",
  },
  {
    id: 5,
    image: "/images/featured-5.png",
    name: "Facial Treatment",
    served: "72 Served this week",
    rank: "05",
  },
];

const FeaturedServices = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <h3 className="fs-18 mb-3 pb-1">Featured Services</h3>

        <ul className="ps-0 mb-0 list-unstyled">
          {featuredServicesData.map((service) => (
            <li
              key={service.id}
              className="border-bottom lcbmp-none"
              style={{
                paddingBottom: "18px",
                marginBottom: "18px",
              }}
            >
              <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <div className="d-flex align-items-center gap-3">
                  <div className="flex-shrink-0">
                    <Image
                      src={service.image}
                      alt={service.name}
                      width={32}
                      height={32}
                    />
                  </div>
                  <div className="flex-grow-1">
                    <h4 className="fs-14 fw-semibold mb-0">{service.name}</h4>
                    <span className="fs-12">{service.served}</span>
                  </div>
                </div>

                <span
                  className="fs-12 fw-medium bg-primary bg-opacity-10 d-inline-block text-center text-primary rounded-circle"
                  style={{
                    width: "20px",
                    height: "20px",
                    lineHeight: "20px",
                  }}
                >
                  {service.rank}
                </span>
              </div>
            </li>
          ))}
        </ul>
      </Card>
    </>
  );
};

export default FeaturedServices;
