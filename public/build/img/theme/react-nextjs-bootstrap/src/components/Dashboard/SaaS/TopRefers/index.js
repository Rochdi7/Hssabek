"use client";

import React from "react";
import { Card, ProgressBar } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const TopRefers = () => {
  // Dynamic data for the list of referrers
  const refersData = [
    {
      name: "Facebook",
      category: "Community",
      image: "/images/facebook.svg",
      progress: 60,
      variant: "primary",
      percentage: "50%",
    },
    {
      name: "Dribbble",
      category: "Community",
      image: "/images/dribbble.svg",
      progress: 75,
      variant: "success",
      percentage: "75%",
    },
    {
      name: "Instagram",
      category: "Reel",
      image: "/images/instagram.svg",
      progress: 30,
      variant: "secondary",
      percentage: "30%",
    },
    {
      name: "Behance",
      category: "Community",
      image: "/images/behance.svg",
      progress: 80,
      variant: "warning",
      percentage: "80%",
    },
    {
      name: "Figma",
      category: "Community",
      image: "/images/figma.svg",
      progress: 50,
      variant: "info",
      percentage: "50%",
    },
    {
      name: "Google",
      category: "SEO & PPC",
      image: "/images/google2.svg",
      progress: 20,
      variant: "danger",
      percentage: "20%",
    },
  ];

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-30 d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h3 className="mb-0">Top Refers</h3>
            <Link href="#" className="text-body text-decoration-none">
              <span>Browse All</span>
              <i className="ri-arrow-right-s-line"></i>
            </Link>
          </div>

          <ul className="ps-0 mb-0 list-unstyled list-last-child">
            {refersData.map((refer, index) => (
              <li key={index} className="mb-3 pb-3 border-bottom">
                <div className="d-flex align-items-center justify-content-between">
                  <div className="flex-shrink-0">
                    <div className="d-flex">
                      <Image src={refer.image} alt={refer.name} width={30} height={30} />
                      <div className="ms-3">
                        <h4 className="mb-0 fs-14 fw-semibold lh-1">{refer.name}</h4>
                        <span className="fs-12">{refer.category}</span>
                      </div>
                    </div>
                  </div>
                  <div className="flex-grow-1 ms-3">
                    <div className="d-flex align-items-center justify-content-end">
                      <ProgressBar
                        variant={refer.variant}
                        now={refer.progress}
                        style={{
                          width: "100px",
                          height: "8px",
                          backgroundColor: "#DDE4FF",
                        }}
                      />
                      <span className="count text-body ms-3 fs-12">{refer.percentage}</span>
                    </div>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default TopRefers;
