"use client";

import React, { useEffect } from "react";
import * as echarts from "echarts";
import { Card } from "react-bootstrap";

const ExpenseBreakdown = () => {
  useEffect(() => {
    const chartDom = document.getElementById("expense_breakdown");
    if (chartDom) {
      const myChart = echarts.init(chartDom);

      const option = {
        tooltip: {
          trigger: "item",
        },
        legend: {
          bottom: "0",
          left: "center",
          itemWidth: 10,
          itemHeight: 10,
          textStyle: {
            fontSize: 12,
            color: "#64748B",
          },
        },
        color: ["#AD63F6", "#BF85FB", "#D7B5FD", "#E9D5FF"],
        series: [
          {
            name: "Expense Breakdown",
            type: "pie",
            radius: "50%",
            data: [
              { value: 1048, name: "Marketing" },
              { value: 735, name: "Sales" },
              { value: 580, name: "Salaries" },
              { value: 484, name: "Miscellaneous" },
            ],
            emphasis: {
              itemStyle: {
                shadowBlur: 10,
                shadowOffsetX: 0,
                shadowColor: "rgba(0, 0, 0, 0.5)",
              },
            },
          },
        ],
      };

      myChart.setOption(option);

      // Cleanup on component unmount
      return () => {
        myChart.dispose();
      };
    }
  }, []);

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-4">Expense Breakdown</h3>

          <div style={{ margin: "-70px 0 0 0" }}>
            <div
              id="expense_breakdown"
              style={{ width: "100%", height: "342px" }}
            />
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default ExpenseBreakdown;
