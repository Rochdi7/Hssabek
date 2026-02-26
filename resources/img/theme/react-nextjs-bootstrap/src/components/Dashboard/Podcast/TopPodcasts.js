"use client";

import { useState } from "react";
import { Dropdown } from "react-bootstrap";
import Image from "next/image";

const podcastsData = [
  {
    id: 1,
    name: "Tom Richards",
    category: "Content Strategist",
    episodes: 95,
    earnings: "$125,000",
    image: "/images/user-129.png",
    rating: 4.5,
  },
  {
    id: 2,
    name: "Amanda Garcia",
    category: "Social Media",
    episodes: 110,
    earnings: "$140,000",
    image: "/images/user-130.png",
    rating: 4.5,
  },
  {
    id: 3,
    name: "Lisa Kim",
    category: "Branding Consultant",
    episodes: 85,
    earnings: "$160,000",
    image: "/images/user-131.png",
    rating: 4.0,
  },
  {
    id: 4,
    name: "Michael Young",
    category: "Data Analytics",
    episodes: 130,
    earnings: "$90,000",
    image: "/images/user-132.png",
    rating: 3.5,
  },
  {
    id: 5,
    name: "Ravi Patel",
    category: "SEO & SEM",
    episodes: 75,
    earnings: "$85,000",
    image: "/images/user-133.png",
    rating: 3.0,
  },
];

const timeRanges = [
  "Last 28 days",
  "Last 48 days",
  "Last 90 days",
  "Last Year",
];

const TopPodcasts = () => {
  const [selectedTimeRange, setSelectedTimeRange] = useState(timeRanges[0]);

  return (
    <div
      className="card custom-shadow rounded-3 bg-white border mb-4"
      style={{ paddingBottom: "18px" }}
    >
      <div
        className="d-flex justify-content-between align-items-center flex-wrap gap-3 position-relative custom-padding-30"
        style={{
          top: "-5px",
          paddingBottom: "18px"
        }}
      >
        <h3 className="mb-0 fs-18 fw-semibold">Top Podcasts</h3>

        <Dropdown
          className="dropdown select-dropdown without-border position-relative"
          style={{ right: "-10px", top: "2px" }}
        >
          <Dropdown.Toggle
            variant="secondary"
            id="dropdown-basic"
            className="dropdown-toggle bg-transparent border text-body rounded-2"
            style={{
              paddingRight: "20px",
            }}
          >
            {selectedTimeRange}
          </Dropdown.Toggle>

          <Dropdown.Menu className="bg-white border box-shadow">
            {timeRanges.map((range, index) => (
              <Dropdown.Item
                key={index}
                onClick={() => setSelectedTimeRange(range)}
                className="text-secondary py-2 px-3"
              >
                {range}
              </Dropdown.Item>
            ))}
          </Dropdown.Menu>
        </Dropdown>
      </div>

      <div className="default-table-area style-three style-two top-podcasts">
        <div className="table-responsive">
          <table className="table align-middle border-0">
            <thead>
              <tr>
                {["Name", "Episodes", "Earnings", "Ratings"].map(
                  (header, index) => (
                    <th
                      key={index}
                      scope="col"
                      className="bg-body-bg"
                      style={{ paddingTop: "6.5px", paddingBottom: "6.5px" }}
                    >
                      <span className="fs-12 fw-medium text-body">
                        {header}
                      </span>
                    </th>
                  )
                )}
              </tr>
            </thead>
            <tbody>
              {podcastsData.map((podcast) => (
                <tr key={podcast.id}>
                  <td>
                    <div className="d-flex align-items-center">
                      <div className="flex-shrink-0">
                        <Image
                          src={podcast.image}
                          className="wh-44 rounded-circle"
                          alt={podcast.name}
                          width={44}
                          height={44}
                        />
                      </div>
                      <div className="flex-grow-1 ms-10 position-relative top-2">
                        <h6 className="mb-0 fs-14 fw-medium">{podcast.name}</h6>
                        <span className="fs-12 text-body">
                          {podcast.category}
                        </span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <span className="fs-14 fw-medium text-secondary">
                      {podcast.episodes}
                    </span>
                  </td>
                  <td>
                    <span className="fs-14 fw-medium text-secondary">
                      {podcast.earnings}
                    </span>
                  </td>
                  <td>
                    <ul className="ps-0 mb-0 list-unstyled d-flex gap-1">
                      {Array.from({ length: 5 }).map((_, i) => (
                        <li key={i}>
                          <i
                            className={`ri-star-${
                              i + 1 <= Math.floor(podcast.rating)
                                ? "fill"
                                : i < podcast.rating
                                ? "half-line"
                                : "line"
                            } text-rating-color fs-15`}
                          ></i>
                        </li>
                      ))}
                    </ul>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
};

export default TopPodcasts;
