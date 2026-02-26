"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";
import ProgressBar from "react-bootstrap/ProgressBar";
  
const channelsData = [
  {
    icon: "/images/facebook.svg",
    name: "Facebook",
    category: "Community",
    progress: 50,
    variant: "primary",
    bgColor: "#DDE4FF",
  },
  {
    icon: "/images/dribbble.svg",
    name: "Dribbble",
    category: "Community",
    progress: 75,
    variant: "info",
    bgColor: "#DAEBFF",
  },
  {
    icon: "/images/instagram.svg",
    name: "Instagram",
    category: "Reel",
    progress: 30,
    variant: "warning",
    bgColor: "#FFE8D4",
  },
  {
    icon: "/images/behance.svg",
    name: "Behance",
    category: "Community",
    progress: 80,
    variant: "secondary",
    bgColor: "#F3E8FF",
  },
  {
    icon: "/images/figma.svg",
    name: "Figma",
    category: "Community",
    progress: 50,
    variant: "success",
    bgColor: "#F3E8FF",
  },
  {
    icon: "/images/google2.svg",
    name: "Google",
    category: "SEO & PPC",
    progress: 20,
    variant: "danger",
    bgColor: "#F3E8FF",
  },
];

const Channels = () => {
  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="mb-3 mb-lg-30">
          <h3 className="mb-0">Channels</h3>
        </div>

        <ul className="ps-0 mb-0 list-unstyled list-last-child">
          {channelsData.slice(0, 6).map((channel, index) => (
            <li key={index} className="mb-3 pb-3 border-bottom">
              <div className="d-flex align-items-center justify-content-between">
                <div className="flex-shrink-0">
                  <div className="d-flex">
                    <Image
                      src={channel.icon}
                      alt={channel.name.toLowerCase()}
                      width={30}
                      height={30}
                    />
                    <div className="ms-3">
                      <h4 className="mb-0 fs-14 fw-semibold lh-1">{channel.name}</h4>
                      <span className="fs-12">{channel.category}</span>
                    </div>
                  </div>
                </div>
                <div className="flex-grow-1 ms-3">
                  <div className="d-flex align-items-center justify-content-end">
                    <ProgressBar
                      now={channel.progress}
                      variant={channel.variant}
                      style={{
                        width: "100px",
                        height: "8px",
                        backgroundColor: channel.bgColor || "#DDE4FF",
                      }}
                    />
                    <span className="count text-body ms-3 fs-12">{channel.progress}%</span>
                  </div>
                </div>
              </div>
            </li>
          ))}
        </ul>
      </Card.Body>
    </Card>
  );
};

export default Channels;